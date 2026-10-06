

if ($metodo == "GET") {

    $sql = "SELECT * FROM chamados ORDER BY id";

    $stmt = $pdo->query($sql);

    $chamados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($chamados);

    exit;
}


/* =========================
   PUT - ATUALIZAR
========================= */

if ($metodo == "PUT") {

    $dados = json_decode(file_get_contents("php://input"), true);

    if (
        empty($dados["id"]) ||
        empty($dados["equipamento"]) ||
        empty($dados["setor"]) ||
        empty($dados["descricao"]) ||
        empty($dados["prioridade"]) ||
        empty($dados["status"])
    ) {

        echo json_encode([
            "mensagem" => "Preencha todos os campos."
        ]);

        exit;
    }

    $sql = "UPDATE chamados SET
            equipamento = ?,
            setor = ?,
            descricao = ?,
            prioridade = ?,
            status = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $dados["equipamento"],
        $dados["setor"],
        $dados["descricao"],
        $dados["prioridade"],
        $dados["status"],
        $dados["id"]
    ]);

    echo json_encode([
        "mensagem" => "Chamado atualizado com sucesso!"
    ]);

    exit;
}


/* =========================
   DELETE - EXCLUIR
========================= */

if ($metodo == "DELETE") {

    $dados = json_decode(file_get_contents("php://input"), true);

    if (empty($dados["id"])) {

        echo json_encode([
            "mensagem" => "Informe o id do chamado."
        ]);

        exit;
    }

    $sql = "DELETE FROM chamados WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $dados["id"]
    ]);

    echo json_encode([
        "mensagem" => "Chamado excluído com sucesso!"
    ]);

    exit;
}


/* =========================
   MÉTODO INVÁLIDO
========================= */

echo json_encode([
    "mensagem" => "Método não permitido."
]);