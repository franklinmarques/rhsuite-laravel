<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ajuda
 * @package App\Models
 */
class Ajuda extends Model
{
    use HasFactory;

    protected $table = 'ajuda';

    protected static $urlPaginas = [
        'home' => 'Início',
        'atividades' => 'Lista de Pendências | To Do',
        'atividades_scheduler' => 'Scheduler - Atividades',
        'Gestão Operacional GT' => [
            'funcionario/novo' => 'Adicionar Colaborador (CLT/PJ)',
            'funcionario/editar' => 'Editar Colaborador (CLT/PJ)',
            'funcionario' => 'Gerenciar Colaboradores (CLT/PJ)',
            'funcionario/importarFuncionario' => 'Importar Colaboradores (CLT)',
            'gestaoDePessoal' => 'Relatórios Gestão GP',
            'examePeriodico' => 'Relatórios de Exames Periódicos',
            'usuarioAfastamento' => 'Relatório de Afastamentos',
            'usuarioDemissao' => 'Relatório de Demissões',
            'funcionario/aniversariantes' => 'Lista de Aniversariantes',
            'ead/funcionarios' => 'Gerenciar Alocação Treinamentos',
            'avaliacaoexp_avaliados/status/2' => 'Status Avaliações Experiência',
            'avaliacaoexp_avaliados/status/1' => 'Status Avaliações Periódicas',
            'pdi' => 'PDIs - Plane de Desenvolvimento Individual'
        ],
        'Estrutura Organizacional' => [
            'estruturas' => 'Gerenciar Estruturas',
            'cargo_funcao' => 'Gerenciar Cargos/Funções'
        ],
        'Job Descriptor' => [
            'jobDescriptor' => 'Job Descriptor'
        ],
        'Gestão Processos Seletivos' => [
            'recrutamento_modelos' => 'Modelos de Testes Online',
            'requisicaoPessoal_emails' => 'E-mails - De Apoio',
            'recrutamento_candidatos' => 'Banco de Candidatos',
            'requisicaoPessoal' => 'Gerenciar Requisições Pessoal',
            'requisicaoPessoal_fontes' => 'Gerenciar Fontes/Aprovadores'
        ],
        'Programas de Capacitação' => [
            'ead/cursos/novo' => 'Adicionar Treinamento',
            'ead/cursos/editar' => 'Editar Treinamento',
            'ead/cursos' => 'Gerenciar Treinamentos',
            'ead/clientes' => 'Gerenciar Treinamentos Clientes',
            'ead/pilulasConhecimento' => 'Gerenciar Pílulas Conhecimento'
        ],
        'Gestão de Treinamentos' => [
            'ead/treinamento' => 'Meus Treinamentos',
            'ead/cursos/disponiveis' => 'Treinamentos Disponíveis'
        ],
        'Gestão de Documentos Corporativos' => [
            'documentos/organizacao' => 'Adicionar Documento',
            'documentos/organizacao/gerenciar' => 'Gerenciar Documentos Organizacionais',
            'documentos/colaborador/gerenciar' => 'Meus Documentos'
        ],
        'Ferramentas de Assessment' => [
            'pesquisa_modelos' => 'Modelos de Pesquisa/Assessment',
            'pesquisa/eneagrama' => 'Personalidade - Eneagrama',
            'pesquisa/jung' => 'Personalidade - Jung',
            'pesquisa/lifo' => 'Personalidade - Estilos LIFO',
            'pesquisa/potencial-ninebox' => 'Potencial-NineBox'
        ],
        'Gestão de Desempenho' => [
            'competencias/cargos' => 'Mapeamento de Competências',
            'competencias/avaliacao' => 'Avaliações por Competências',
            'avaliacaoexp_modelos' => 'Modelos de Avaliações',
            'avaliacaoexp_avaliados' => 'Avaliações Período Experiência',
            'avaliacaoexp' => 'Avaliações Periódicas Desempenho'
        ],
        'Gestão de Pesquisas' => [
            'pesquisa/clima' => 'Pesquisa de Clima Organizacional',
            'pesquisa/perfil' => 'Pesquisa de Perfil Profissional',
            'pesquisa_modelos' => 'Modelos de Pesquisa/Assessment'
        ],
        'Gestão de Facilities' => [
            'facilities/empresas' => 'Itens de Vistoria/Manutenção',
            'facilities/estruturas' => 'Cadastro Estrutural',
            'facilities/modelos' => 'Modelos de Vistorias/Manutenções',
            'facilities/vistorias' => 'Gerenciar Vistorias',
            'facilities/manutencoes' => 'Gerenciar Manutenções',
            'facilities/contasMensais' => 'Contas Mensais Facilities',
            'facilities/fornecedoresPrestadores' => 'Gerenciar Fornecedores',
            'facilities/ordensServico' => 'Gerenciar Ordens de Serviço'
        ],
        'Gestão de Processos' => [
            'relatoriosGestao' => 'Relatórios de Gestão'
        ],
        'Gestão Operacional ST' => [
            'st/apontamento' => 'Gerenciar Apontamentos',
            'requisicaoPessoal/st' => 'Requisição de Pessoal'
        ],
        'Gestão Operacional CD' => [
            'cd/apontamento' => 'Gerenciar Apontamentos',
            'requisicaoPessoal/cd' => 'Requisição de Pessoal'
        ],
        'Gestão Operacional EI' => [
            'ei/apontamento' => 'Gerenciar Apontamentos',
            'requisicaoPessoal/ei' => 'Requisição de Pessoal'
        ],
        'Gestão Operacional PAPD' => [
            'papd/atendimentos' => 'Gerenciar Atendimentos',
            'papd/pacientes' => 'Gerenciar Pacientes',
            'papd/atividades_deficiencias' => 'Gerenciar Atividades/Deficiências',
            'papd/relatorios/medicao_mensal' => 'Relatório de Medição (Individual)',
            'papd/relatorios/medicao_consolidada' => 'Relatório de Medição (Equipe)',
            'papd/relatorios/medicao_anual' => 'Relatório de Medição (Consolidado)',
            'requisicaoPessoal/papd' => 'Gerenciar Requisição de Pessoal'
        ],
        'Gestão Operacional CDH' => [
            'cdh/apontamento' => 'Gerenciar Apontamentos',
            'requisicaoPessoal/cdh' => 'Requisição de Pessoal'
        ],
        'Gestão Operacional ICOM' => [
            'icom/apontamento' => 'Gerenciar Apontamentos',
            'requisicaoPessoal/icom' => 'Requisição de Pessoal',
            'icom/recursosApoioSp' => 'Portal ICOM SP',
            'icom/recursosApoioOp' => 'Portal ICOM OP'
        ],
        'Gestão Operacional ADM-FIN' => [
            'adm-fin/apontamento' => 'Gerenciar Apontamentos',
            'requisicaoPessoal/adm-fin' => 'Requisição de Pessoal'
        ],
        'Gestão Operacional GExec' => [
            'gexec/apontamento' => 'Gerenciar Apontamentos',
            'requisicaoPessoal/gexec' => 'Requisição de Pessoal'
        ],
        'Gestão da Plataforma' => [
            'gestaoProcessos' => 'Gestão de Processos',
            'backup' => 'Backup/Restore de Database',
            'log_usuarios' => 'Log de Usuários'
        ]
    ];

    public static function getUrlPaginas()
    {
        return self::$urlPaginas;
    }
}
