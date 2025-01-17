## JSONRPC Api Laravel
A little demo how to implement JSONRPC in Laravel. This demo is not complete 
and just MVP.

The JSONRPC entry point `/api`.
The method is `test`:
```json
{
    "id": "1234",
    "method": "test",
    "params": {
        "trashed": null,
        "id": "1234567890",
        "country": "UA",
        "index": "45",
        "status": "ok"
    }
}
```
RPC methods namespace is `App\Rpc\Methods`.

TODO:
- responses are not implemented at all.
- JSONRPC params can initialize method properties without validation.
- `ByDefault` attribute is not implemented, so readonly properties without values will cause access error.
- class and contract names are not obvious and should be refactored.

