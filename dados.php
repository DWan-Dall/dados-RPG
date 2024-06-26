<?php
if (isset($_GET['dado'])) {
    $dado = intval($_GET['dado']);

    // Verificação se o valor do dado é válido
    if ($dado > 0) {
        $valor = rand(1, $dado);
        $response = ['message' => "O valor foi: $valor"];

        $elogio = [
        "Você brilhou como um verdadeiro herói!",
        "Essa jogada foi digna de uma lenda!",
        "Uma jogada épica! Você salvou o dia!",
        "Isso é o que eu chamo de maestria!",
        "Você virou o jogo a seu favor com maestria!",
        "Sua sorte é invejável!",
        "Que precisão! Você é imbatível!",
        "Uma jogada perfeita! Parabéns!",
        "Você fez isso parecer fácil!",
        "Sua habilidade é incomparável!",
        "Você é uma inspiração para todos nós!",
        "Impressionante! Você superou todas as expectativas!",
        "Essa jogada vai entrar para a história!",
        "Sua inteligência brilhou nessa jogada!",
        "Magnífico! Uma jogada impecável!",
        "Sua destreza é admirável!",
        "Bravíssimo! Você mostrou quem manda!",
        "Uma jogada esplêndida!",
        "Você está em uma classe própria!",
        "Sua perspicácia salvou o dia!",
        "Um verdadeiro mestre dos dados!",
        "Você acertou em cheio!",
        "Sua jogada foi absolutamente brilhante!",
        "Sua estratégia foi perfeita!",
        "Você desbancou todas as probabilidades!",
        "Que show de habilidade!",
        "Uma jogada magistral!",
        "Você mostrou o que é ser um verdadeiro aventureiro!",
        "Incrível! Você virou a maré a nosso favor!",
        "Sua jogada foi um verdadeiro golpe de sorte!",
        "Você demonstrou uma coragem incrível!",
        "Sua jogada foi digna de aplausos!",
        "Você dominou a situação com perfeição!",
        "Que movimento elegante e preciso!",
        "Você superou todos os desafios com facilidade!",
        "Sua decisão foi brilhante!",
        "Que incrível demonstração de habilidade!",
        "Você agiu com sabedoria e precisão!",
        "Sua estratégia foi impecável!",
        "Uma jogada magistral que virou o jogo!",
        "Você provou ser um verdadeiro mestre!",
        "Que exibição de talento!",
        "Sua destreza é surpreendente!",
        "Você deixou todos boquiabertos!",
        "Uma jogada fantástica e bem calculada!",
        "Você mostrou como é feito!",
        "Você venceu as probabilidades!",
        "Sua jogada foi como um golpe de mestre!",
        "Que habilidade impressionante!",
        "Você dominou o campo de batalha!",
        "Sua ação foi rápida e certeira!",
        "Você fez parecer fácil!",
        "Uma jogada simplesmente espetacular!",
        "Você fez um movimento genial!",
        "Sua jogada foi perfeita em todos os aspectos!",
        "Você é um verdadeiro estrategista!",
        "Que jogada fenomenal!",
        "Você fez a diferença!",
        "Sua habilidade é realmente incomparável!",
        "Você arrasou com uma jogada magistral!",
        "Você trouxe a vitória com uma jogada perfeita!"
        ];

        $bolaFora = [
        "Tropeçou em uma minhoca e quebrou a arma que estava em sua mão.",
        "Caiu em um buraco e perdeu tempo tentando sair.",
        "Errou o alvo e acertou um aliado acidentalmente.",
        "Perdeu o equilíbrio e caiu de cara no chão.",
        "Tentou atacar, mas deixou a arma cair no processo.",
        "Se confundiu e usou o feitiço errado, causando um efeito adverso.",
        "Foi surpreendido por um inimigo que estava escondido.",
        "Escorregou em uma poça de lama e ficou coberto de sujeira.",
        "Sua arma ficou presa e você não conseguiu puxá-la a tempo.",
        "Ao tentar esquivar, acabou se machucando sozinho.",
        "Foi desarmado pelo inimigo em um movimento hábil.",
        "Perdeu sua poção de cura ao tropeçar.",
        "Errou um salto e caiu em uma armadilha.",
        "Distraído, não percebeu um inimigo se aproximando por trás.",
        "Deu um passo em falso e ativou um mecanismo de defesa.",
        "Ao tentar se esconder, acabou chamando mais atenção.",
        "Seu feitiço falhou e você sofreu um contra-ataque.",
        "Ao tentar abrir uma porta, quebrou a chave na fechadura.",
        "Ficou preso em uma rede armada pelos inimigos.",
        "Perdeu um item valioso ao ser atingido.",
        "Se atrapalhou e caiu no meio da batalha.",
        "Foi cegado por um clarão inesperado.",
        "Ao tentar negociar, acabou ofendendo a outra parte.",
        "Se confundiu no mapa e foi parar no lugar errado.",
        "Esbarrou em um objeto e fez um barulho alto, alertando os inimigos.",
        "Ao tentar nadar, foi arrastado pela correnteza.",
        "Perdeu a concentração e falhou ao conjurar um feitiço.",
        "Seu escudo quebrou ao tentar bloquear um ataque.",
        "Foi pego em uma emboscada inesperada.",
        "Ficou paralisado de medo ao ver uma criatura aterrorizante.",
        "Ao tentar pular, torceu o tornozelo e ficou mancando.",
        "Tentou atacar, mas acertou uma pedra e machucou a mão.",
        "Perdeu o controle e caiu de uma altura considerável.",
        "Foi atingido por uma flecha perdida enquanto distraído.",
        "Acidentalmente derrubou a mochila, espalhando todos os itens.",
        "Ficou preso em um matagal e levou tempo para se libertar.",
        "Tentou fugir, mas acabou se enredando em um cipó.",
        "Errou o lançamento e o projétil voltou contra você.",
        "Foi surpreendido por uma criatura pequena, mas irritante.",
        "Ao tentar escalar, escorregou e caiu de volta ao chão.",
        "Seu feitiço falhou e você ficou temporariamente cego.",
        "Ao tentar persuadir, acabou ofendendo gravemente a outra parte.",
        "Perdeu um item importante ao atravessar um rio.",
        "Seu escudo escorregou da mão no momento crucial.",
        "Foi atingido por uma pedra rolando enquanto distraído.",
        "Destruiu acidentalmente uma pista crucial.",
        "Errou um golpe e acertou um objeto frágil e valioso.",
        "Foi confundido por um truque de ilusão.",
        "Se atrapalhou e deixou cair sua arma em um precipício.",
        "Ao tentar falar, gaguejou e não conseguiu se expressar.",
        "Foi atingido por um ataque furtivo enquanto distraído.",
        "Ficou preso em uma armadilha que não conseguiu desarmar.",
        "Errou um ataque e feriu-se com sua própria arma.",
        "Perdeu o equilíbrio e caiu em uma poça de água suja.",
        "Ficou temporariamente surdo devido a um barulho alto.",
        "Ao tentar escalar uma árvore, acabou ficando preso.",
        "Esqueceu um feitiço crucial no momento necessário.",
        "Errou o alvo e chamou a atenção dos inimigos próximos.",
        "Ficou preso em uma sala trancada.",
        "Seu movimento brusco despertou um ninho de criaturas irritadas.",
        "Ao tentar evitar um ataque, tropeçou e caiu, ficando vulnerável a um segundo golpe."
        ];

        if ($valor >= intval(0.9 * $dado)) {
            $response['message'] .= " " . $elogio[rand(0, count($elogio) - 1)];
        } 
        if ($valor == 20) {
            $response['message'] .= " CRÍTICO!";
        }  
        if ($valor <= intval(0.2 * $dado)) {
            $response['message'] .= " " . $bolaFora[rand(0, count($bolaFora) - 1)];
        }

        echo json_encode($response);
    } else {
        echo json_encode(['message' => "Dado não suportado!"]);
    }
} else {
    echo json_encode(['message' => "Erro ao lançar o dado."]);
}
?>