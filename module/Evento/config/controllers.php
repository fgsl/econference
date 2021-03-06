<?php
use Evento\Controller\CategoriasController;
use Evento\Controller\CredenciamentosController;
use Evento\Controller\LocaisController;
use Evento\Controller\GradesController;
use Evento\Controller\ParticipantesController;
use Evento\Controller\AnfitriasController;
use Evento\Controller\TrabalhosController;
use Evento\Controller\EdicoesController;
use Evento\Controller\PropriedadesController;
use Evento\Controller\ServicosController;

/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

return [
    'factories' => [
        AnfitriasController::class => 'Evento\Controller\AnfitriasControllerFactory',
        CategoriasController::class => 'Evento\Controller\CategoriasControllerFactory',
        CredenciamentosController::class => 'Evento\Controller\CredenciamentosControllerFactory',
        EdicoesController::class => 'Evento\Controller\EdicoesControllerFactory',
        GradesController::class => 'Evento\Controller\GradesControllerFactory',
        LocaisController::class => 'Evento\Controller\LocaisControllerFactory',
        ParticipantesController::class => 'Evento\Controller\ParticipantesControllerFactory',
        PropriedadesController::class => 'Evento\Controller\PropriedadesControllerFactory',
        ServicosController::class => 'Evento\Controller\ServicosControllerFactory',
        TrabalhosController::class => 'Evento\Controller\TrabalhosControllerFactory'
    ],
];