<?php

namespace App\Architecture\Product\Enum;

class ProductEnum
{
//Messages
    const NOT_FOUND = 'Produto não encontrado.';
    const CREATED = 'Produto foi criada com sucesso.';
    const UPDATED = 'Produto foi atualizada com sucesso.';
    const DESACTIVE = 'Produto foi desativada com sucesso';
    const ACTIVE = 'Produto foi ativada com sucesso';
    const DELETE = 'Produto foi excluída com sucesso';
    const NOT_CREATED = 'Erro ao cadastrar a produto';
    const NOT_UPDATED = 'Erro ao editar a produto.';
    const NOT_ACTIVED = 'Erro ao ativar a produto.';
    const NOT_DESACTIVED = 'Erro ao desativar a produto.';
    const NOT_DELETED = 'Erro ao deletar a produto.';
}
