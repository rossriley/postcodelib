## A Value Object for UK Postcodes

This simple class ensure that a postcode is valid along with some helper methods to ease formatting.

### Usage

```
use Postcodelib\Postcode;

$postcode = new Postcode('B55SE');
$postcode->valid(); // returns true
$postcode->postcode(); // returns a normalised string: B5 5SE
$postcode->prefix(); // returns B5
$postcode->suffix(); // returns 5SE
```