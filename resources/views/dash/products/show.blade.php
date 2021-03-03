<div class="container">
    <div class="row">
        <div class="col form-group">
            <label for="name">Nome do produto</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" disabled />
        </div>
    </div>

    <div class="row">
        <div class="col form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" style="resize: vertical" disabled>{{ $product->description }}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col form-group">
            <label for="price">Preço</label>
            <input type="text" id="price" name="price" class="form-control" disabled value="{{ \App\Traits\Utils::formatar_valor($product->price) }}" />
        </div>

        <div class="col form-group">
            <label for="created_at">Data de Cadastro</label>
            <input type="text" id="created_at" name="created_at" class="form-control" disabled value="{{ \App\Traits\Utils::formata_data_hora($product->created_at) }}" />
        </div>
    </div>
</div>
