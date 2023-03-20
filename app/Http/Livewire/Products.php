<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;

    public Product $product;
    public $photo;

    public bool $popUp = false;

    protected $rules = [
        'product.title' => ['required', 'string'],
        'product.description' => ['required', 'string'],
        'product.price' => ['required', 'numeric', 'min:0'],
        'product.thumbnail' => '',
        'photo' => ['required', 'image'],
    ];

    public function close()
    {
        $this->photo = null;
        $this->reset(['popUp']);
    }

    public function store()
    {
        $this->validate();

        //photo method
        $this->photo->store('public/products');
        $image = $this->photo->hashName();

        //save model
        $this->product->thumbnail = $image;
        $this->product->save();

        $this->close();
    }

    public function add()
    {
        $this->popUp = true;
        $this->product = new Product();
    }

    public function update(Product $product)
    {
        $this->popUp = true;
        $this->product = $product;
    }

    public function delete(Product $product)
    {

        Storage::delete('public/products/'.$product->thumbnail);
        $product->delete();
    }

    public function render()
    {
        $products = Product::orderByDesc('created_at')->paginate(5);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }

}
