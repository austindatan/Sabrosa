namespace App\View\Components;

use Illuminate\View\Component;

class CartItem extends Component
{
    public $image, $name, $priceText, $quantity, $total;

    public function __construct($image, $name, $priceText, $quantity, $total)
    {
        $this->image = $image;
        $this->name = $name;
        $this->priceText = $priceText;
        $this->quantity = $quantity;
        $this->total = $total;
    }

    public function render()
    {
        return view('components.cart-item');
    }
}
