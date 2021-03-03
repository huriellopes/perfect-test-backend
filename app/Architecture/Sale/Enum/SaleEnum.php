<?php

namespace App\Architecture\Sale\Enum;

class SaleEnum
{
    //Messages
    const NOT_FOUND = 'Venda não encontrada.';
    const CREATED = 'Venda foi criada com sucesso.';
    const UPDATED = 'Venda foi atualizada com sucesso.';
    const DESACTIVE = 'Venda foi desativada com sucesso';
    const ACTIVE = 'Venda foi ativada com sucesso';
    const DELETE = 'Venda foi excluída com sucesso';
    const NOT_CREATED = 'Erro ao cadastrar a venda';
    const NOT_UPDATED = 'Erro ao editar a venda.';
    const NOT_ACTIVED = 'Erro ao ativar a venda.';
    const NOT_DESACTIVED = 'Erro ao desativar a venda.';
    const NOT_DELETED = 'Erro ao deletar a venda.';
}
