<div class="row g-3">
    <div class="col-md-6">
        <label for="product_id" class="form-label fw-semibold">Produto</label>

        <select name="product_id" id="product_id" class="form-select">
            <option value="">Selecione um produto</option>

            @foreach ($products ?? collect() as $product)
                <option value="{{ $product->id }}" @selected((string) old('product_id', $movement->product_id ?? '') === (string) $product->id)>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="type" class="form-label fw-semibold">Tipo de movimentação</label>

        <select name="type" id="type" class="form-select">
            <option value="">Selecione o tipo</option>
            <option value="entry" @selected(old('type', $movement->type ?? '') === 'entry')>Entrada</option>
            <option value="exit" @selected(old('type', $movement->type ?? '') === 'exit')>Saída</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="quantity" class="form-label fw-semibold">Quantidade</label>

        <input type="number" min="1" name="movement_quantity" id="movement_quantity" class="form-control"
            value="{{ old('quantity', $movement->quantity ?? '') }}" placeholder="Ex: 10">
    </div>

    <div class="col-md-8">
        <label for="description" class="form-label fw-semibold">Observação</label>

        <input type="text" name="description" id="description" class="form-control"
            value="{{ old('description', $movement->description ?? '') }}"
            placeholder="Ex: reposição do fornecedor, ajuste de estoque, venda no balcão">
    </div>

    <div class="col-12">
        <div class="card bg-light border-0">
            <div class="card-body">
                <div class="fw-semibold mb-2">Como esta tela vai conversar com o back-end depois</div>
                <div class="small text-muted">
                    Quando ligarmos essa tela ao back-end, o sistema vai validar o produto, o tipo da movimentação,
                    a quantidade informada e atualizar automaticamente o estoque do item.
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center gap-2 mt-4 pt-2">
    <a href="{{ $indexUrl ?? '#' }}" class="btn btn-outline-secondary px-4">
        Cancelar
    </a>

    <button type="submit" class="btn btn-primary px-4">
        Registrar movimentação
    </button>
</div>
