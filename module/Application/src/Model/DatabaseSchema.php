<?php

/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace Application\Model;

use Ftsl\Model\AbstractDatabaseSchema;
use Zend\Db\Sql\Ddl\Column\Blob;
use Zend\Db\Sql\Ddl\Column\Boolean;
use Zend\Db\Sql\Ddl\Column\Date;
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Column\Time;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\Sql\Ddl\Constraint\PrimaryKey;

class DatabaseSchema extends AbstractDatabaseSchema{

    /**
     * @return multitype:multitype:multitype:string  multitype:multitype:boolean NULL string multitype:string   multitype:number boolean NULL string    multitype:multitype:multitype:string   multitype:multitype:boolean NULL string    multitype:multitype:string  multitype:multitype:boolean NULL string multitype:string   multitype:boolean NULL string    multitype:multitype:string  multitype:multitype:boolean NULL string multitype:string   multitype:number boolean NULL string  multitype:boolean NULL string
     */
    public static function getSchema() {
        return [
            'anfitrias' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'nome' => [Varchar::class, 30, false, ''],
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'categorias' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'nome' => [Varchar::class, 30, false, ''],
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'credenciamentos' => [
                'fields' => [
                    'codigo_participante' => [Integer::class, false, null],
                    'codigo_edicao' => [Integer::class, false, null],
                    'credenciado' => [Integer::class, false, null],
                ],
                'constraints' => [
                    PrimaryKey::class => ['codigo_participante', 'codigo_edicao']
                ]
            ],
            'edicoes' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'edicao' => [Integer::class, false, null],
                    'codigo_anfitria' => [Integer::class, false, null],
                    'encerrada' => [Boolean::class, false, null],
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'grades' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'codigo_trabalho' => [Integer::class, false, null],
                    'data' => [Date::class, false, null],
                    'horario' => [Time::class, false, null],
                    'codigo_local' => [Integer::class, false, null],
                    'codigo_edicao' =>[Integer::class, false, null]
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'locais' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'nome' => [Varchar::class, 30, false, ''],
                    'codigo_anfitria' => [Integer::class, false, null]
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'participantes' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'usuario' => [Varchar::class, 20, false, ''],
                    'senha' => [Varchar::class, 255, false, ''],
                    'email' => [Varchar::class, 80, false, ''],
                    'nome' => [Varchar::class, 80, false, ''],
                    'cidade' => [Varchar::class, 8, false, ''],
                    'telefone' => [Varchar::class, 20, false, ''],
                    'instituicao' => [Varchar::class, 80, false, ''],
                    'cpf' => [Varchar::class, 13, false, ''],
                    'passaporte' => [Varchar::class, 10, false, ''],
                    'conferencista' => [Boolean::class, false, null] 
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'perfis' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'nome' => [Varchar::class, 30, false, ''],
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'permissoes' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'nome' => [Varchar::class, 30, false, ''],
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'permissoes_perfil' => [
                'fields' => [
                    'codigo_permissao' => [Integer::class, false, null],
                    'codigo_perfil' => [Integer::class, false, null],
                ],
                'constraints' => [
                    PrimaryKey::class => ['codigo_permissao', 'codigo_perfil']
                ]
            ],
            'trabalhos' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'resumo' => [Blob::class, false, false, null],
                    'codigo_categoria' => [Integer::class, false, null],
                    'tipo' => [Integer::class, false, null],
                    'codigo_participante' => [Integer::class, false, null],
                    'codigo_edicao' => [Integer::class, false, null]
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'usuarios' => [
                'fields' => [
                    'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                    'nome' => [Varchar::class, 30, false, ''],
                    'senha' => [Varchar::class, 255, false, ''],
                    'codigo_perfil' => [Integer::class, false, null],
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],
            'decisoes' => [
                 'fields' => [
                     'codigo' => [Integer::class, false, null, ['AUTO_INCREMENT' => 'AUTO_INCREMENT']],
                     'decisao' => [Varchar::class, 80, false,''],
                     'aberta' => [Boolean::class, false, null],
                ],
                'constraints' => [
                    PrimaryKey::class => 'codigo'
                ]
            ],        
            'votacoes' => [
               'fields' => [
                   'codigo_decisao' => [Integer::class, false, null],
                   'codigo_usuario' => [Integer::class, false, null],
                   'favoravel' => [Boolean::class, false, null],
                ],
                'constraints' => [
                    PrimaryKey::class => ['codigo_decisao', 'codigo_usuario']
                ]
            ]
        ];
    }
}