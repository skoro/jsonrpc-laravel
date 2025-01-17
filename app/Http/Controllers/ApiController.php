<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Rpc\Rpc;
use App\Rpc\RpcRequest;
use Illuminate\Container\Attributes\Config;
use Illuminate\Http\Request;

final class ApiController extends Controller
{
    public function __construct(
        private readonly Rpc $rpc,
        #[Config('services.jsonrpc_max_batch', 10)] private readonly int $maxBatchSize,
    ) {}

    public function __invoke(Request $request)
    {
        try {
            /** @var object|non-empty-array<object> $input */
            $input = json_decode($request->getContent(), associative: false, flags: JSON_THROW_ON_ERROR);
            if (is_object($input)) {
                $input = [$input];
            }

            if (is_array($input) && count($input) === 0) {
                throw new \Exception('Empty batch');
            }

            if (! is_array($input)) {
                throw new \Exception('Invalid jsonrpc request');
            }

            if (count($input) > $this->maxBatchSize) {
                throw new \Exception('Max batch size exceeded');
            }

            $responses = [];

            foreach ($input as $data) {
                $rpcRequest = RpcRequest::create($data);
                $rpcMethod = $this->rpc->getMethod($rpcRequest);

                if ($rpcRequest->id) {
                    $responses[] = $rpcMethod();
                } else {
                    $rpcMethod();
                }
            }

            return $responses;
        } catch (\Exception $exception) {
            throw $exception;
//            logger()->error($exception->getMessage());
        }
    }
}
