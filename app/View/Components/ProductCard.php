namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $name, $image, $price, $route, $brand;

    public function __construct($name, $image, $price, $route, $brand)
    {
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->route = $route;
        $this->brand = $brand;
    }

    public function render()
    {
        return view('components.product-card');
    }
}
