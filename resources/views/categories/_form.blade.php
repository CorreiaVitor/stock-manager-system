<div class="mb-4">
    <label for="name" class="form-label fw-semibold">Nome da categoria</label>

    <input
        type="text"
        name="name"
        id="name"
        class="form-control"
        value="{{ old('name', $category->name ?? '') }}"
        placeholder="Ex: Bebidas"
    >
</div>

<div class="mb-4">
    <label for="description" class="form-label fw-semibold">Descrição</label>

    <textarea
        name="description"
        id="description"
        rows="4"
        class="form-control"
        placeholder="Descrição opcional da categoria"
    >{{ old('description', $category->description ?? '') }}</textarea>
</div>

<div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center gap-2 pt-2">
    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary px-4">
        Voltar
    </a>

    <button type="submit" class="btn btn-primary px-4">
        Salvar categoria
    </button>
</div>