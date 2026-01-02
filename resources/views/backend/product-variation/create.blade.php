<x-backend.layouts.main title="{!! 'Маҳсулот яратиш: ' . ucfirst($product->title) !!}">
    <div class="product_variation-create">
        <x-backend.product-variation.form
            :method="'POST'"
            :productVariation="$productVariation"
            :action="url('admin/product/' . $product->id . '/variations')"
{{--            :action="route('product-variation.store.custom', $product->id)"--}}
        />
    </div>
</x-backend.layouts.main>
