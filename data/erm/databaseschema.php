<?php
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\Sql\Ddl\Column\Boolean;
use Zend\Db\Sql\Ddl\Constraint\PrimaryKey;
use Zend\Db\Sql\Ddl\Column\Date;
use Zend\Db\Sql\Ddl\Column\Time;

return [
    'categorias' => [
        'fields' => [
            'codigo'    => [Integer::class,false,null,['AUTO_INCREMENT']],
            'nome'      => [Varchar::class,30,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]        
    ],
    'credenciamentos' => [
        'fields' => [
            'codigo_participante' => [Integer::class,false,null],
            'codigo_edicao'       => [Integer::class,false,null],            
            'credenciado'         => [Integer::class,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => ['codigo_participante','codigo_edicao']
        ]
    ],
    'edicoes' => [
        'fields' => [
            'codigo'                => [Integer::class,false,null,['AUTO_INCREMENT']],
            'edicao'                => [Integer::class,false,null],
            'codigo_sediadora'      => [Integer::class,false,null],                        
            'encerrada'             => [Boolean::class,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]
    ],    
    'grades' => [
        'fields' => [
            'codigo'            => [Integer::class,false,null,['AUTO_INCREMENT']],
            'codigo_trabalho'   => [Integer::class,false,null],            
            'data'              => [Date::class,false,null],
            'horario'           => [Time::class,false,null],
            'codigo_local'      => [Integer::class,false,null]
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]        
    ],
    'locais' => [
        'fields' => [
            'codigo'    => [Integer::class,false,null,['AUTO_INCREMENT']],
            'nome'      => [Varchar::class,30,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]
    ],
    'participantes' => [
        'fields' => [
            'codigo'        => [Integer::class,false,null,['AUTO_INCREMENT']],
            'usuario'       => [Varchar::class,20,false,null],
            'email'         => [Varchar::class,80,false,null],
            'nome'          => [Varchar::class,80,false,null],
            'cidade'        => [Varchar::class,8,false,null],
            'telefone'      => [Varchar::class,20,false,null],
            'instituicao'   => [Varchar::class,80,false,null],
            'cpf'           => [Varchar::class,13,false,null],
            'passaporte'    => [Varchar::class,10,false,null]
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]
    ],
    'perfis' => [
        'fields' => [
            'codigo'    => [Integer::class,false,null,['AUTO_INCREMENT']],
            'nome'      => [Varchar::class,30,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]        
    ],
    'permissoes' => [
        'fields' => [
            'codigo'    => [Integer::class,false,null,['AUTO_INCREMENT']],
            'nome'      => [Varchar::class,30,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]        
    ],
    'permissoes_perfil' => [
        'fields' => [
            'codigo_permissao'   => [Integer::class,false,null],
            'codigo_perfil'      => [Integer::class,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => ['codigo_permissao','codigo_perfil']
        ]        
    ],
    'sediadoras' => [
        'fields' => [
            'codigo'    => [Integer::class,false,null,['AUTO_INCREMENT']],
            'nome'      => [Varchar::class,30,false,null],
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]
    ],
    'trabalhos' => [
        'fields' => [
            'codigo'        => [Integer::class,false,null,['AUTO_INCREMENT']],
            'nome'          => [Varchar::class,30,false,null],
            'categoria'     => [Integer::class,false,null],
            'tipo'          => [Integer::class,false,null],                        
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]        
    ],
    'usuarios' => [
        'fields' => [
            'codigo'            => [Integer::class,false,null,['AUTO_INCREMENT']],
            'nome'              => [Varchar::class,30,false,null],
            'codigo_perfil'     => [Integer::class,false,null],            
        ],
        'constraints' => [
            PrimaryKey::class => 'codigo'
        ]        
    ],    
];
