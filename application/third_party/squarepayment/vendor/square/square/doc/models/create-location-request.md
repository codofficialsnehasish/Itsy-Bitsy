
# Create Location Request

The request object for the [CreateLocation](../../doc/apis/locations.md#create-location) endpoint.

## Structure

`CreateLocationRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `location` | [`?Location`](../../doc/models/location.md) | Optional | Represents one of a business' [locations](https://developer.squareup.com/docs/locations-api). | getLocation(): ?Location | setLocation(?Location location): void |

## Example (as JSON)

```json
{
  "location": {
    "address": {
      "address_line_1": "1234 Peachtree St. NE",
      "administrative_district_level_1": "GA",
      "locality": "Atlanta",
      "postal_code": "30309",
      "address_line_2": "address_line_20",
      "address_line_3": "address_line_36",
      "sublocality": "sublocality0"
    },
    "description": "Midtown Atlanta store",
    "name": "Midtown",
    "id": "id4",
    "timezone": "timezone6",
    "capabilities": [
      "CREDIT_CARD_PROCESSING"
    ]
  }
}
```
