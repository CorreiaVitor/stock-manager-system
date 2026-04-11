<div class="row g-3">
    <div class="col-md-8">
        <label for="name" class="form-label fw-semibold">Nome do produto</label>

        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            value="{{ old('name', $product->name ?? '') }}"
            placeholder="Ex: Coca-Cola 2L"
        >
    </div>

    <div class="col-md-4">
        <label for="category_id" class="form-label fw-semibold">Categoria</label>

        <select
            name="category_id"
            id="category_id"
            class="form-select"
        >
            <option value="">Selecione uma categoria</option>

            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected((string) old('category_id', $product->category_id ?? '') === (string) $category->id)
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Descrição</label>

        <textarea
            name="description"
            id="description"
            rows="4"
            class="form-control"
            placeholder="Descrição opcional do produto"
        >{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="col-md-4">
        <label for="price" class="form-label fw-semibold">Preço</label>

        <input
            type="number"
            step="0.01"
            min="0"
            name="price"
            id="price"
            class="form-control"
            value="{{ old('price', $product->price ?? '') }}"
            placeholder="0.00"
        >
    </div>

    <div class="col-md-4">
        <label for="quantity" class="form-label fw-semibold">Quantidade</label>

        <input
            type="number"
            min="0"
            name="quantity"
            id="quantity"
            class="form-control"
            value="{{ old('quantity', $product->quantity ?? '') }}"
            placeholder="0"
        >
    </div>

    <div class="col-md-4">
        <label for="minimum_stock" class="form-label fw-semibold">Estoque mínimo</label>

        <input
            type="number"
            min="0"
            name="minimum_stock"
            id="minimum_stock"
            class="form-control"
            value="{{ old('minimum_stock', $product->minimum_stock ?? '') }}"
            placeholder="0"
        >
    </div>
</div>

<div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center gap-2 mt-4 pt-2">
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">
        Voltar
    </a>

    <button type="submit" class="btn btn-primary px-4">
        Salvar produto
    </button>
</div>