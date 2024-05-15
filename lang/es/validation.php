<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted'             => ':attribute debe ser aceptado.',
    'accepted_if'          => ':attribute debe ser aceptado cuando :other sea :value.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute sólo debe contener letras.',
    'alpha_dash'           => ':attribute sólo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => ':attribute sólo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'attached'             => 'Este :attribute ya se adjuntó.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'array'   => ':attribute tiene que tener entre :min - :max elementos.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'current_password'     => 'La contraseña es incorrecta.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_equals'          => ':attribute debe ser una fecha igual a :date.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'declined'             => ':attribute debe ser rechazado.',
    'declined_if'          => ':attribute debe ser rechazado cuando :other sea :value.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido.',
    'ends_with'            => 'El campo :attribute debe finalizar con uno de los siguientes valores: :values',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'gt'                   => [
        'array'   => 'El campo :attribute debe tener más de :value elementos.',
        'file'    => 'El campo :attribute debe tener más de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'string'  => 'El campo :attribute debe tener más de :value caracteres.',
    ],
    'gte'                  => [
        'array'   => 'El campo :attribute debe tener como mínimo :value elementos.',
        'file'    => 'El campo :attribute debe tener como mínimo :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser como mínimo :value.',
        'string'  => 'El campo :attribute debe tener como mínimo :value caracteres.',
    ],
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => ':attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe ser una cadena JSON válida.',
    'lt'                   => [
        'array'   => 'El campo :attribute debe tener menos de :value elementos.',
        'file'    => 'El campo :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'string'  => 'El campo :attribute debe tener menos de :value caracteres.',
    ],
    'lte'                  => [
        'array'   => 'El campo :attribute debe tener como máximo :value elementos.',
        'file'    => 'El campo :attribute debe tener como máximo :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser como máximo :value.',
        'string'  => 'El campo :attribute debe tener como máximo :value caracteres.',
    ],
    'max'                  => [
        'array'   => ':attribute no debe tener más de :max elementos.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'numeric' => ':attribute no debe ser mayor que :max.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'mimetypes'            => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'array'   => ':attribute debe tener al menos :min elementos.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
    ],
    'multiple_of'          => 'El campo :attribute debe ser múltiplo de :value',
    'not_in'               => ':attribute es inválido.',
    'not_regex'            => 'El formato del campo :attribute no es válido.',
    'numeric'              => ':attribute debe ser numérico.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'prohibited'           => 'El campo :attribute está prohibido.',
    'prohibited_if'        => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless'    => 'El campo :attribute está prohibido a menos que :other sea :values.',
    'prohibits'            => 'El campo :attribute prohibe que :other esté presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'relatable'            => 'Este :attribute no se puede asociar con este recurso',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values está presente.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'array'   => ':attribute debe contener :size elementos.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'string'  => ':attribute debe contener :size caracteres.',
    ],
    'starts_with'          => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => ':Attribute debe ser una zona horaria válida.',
    'unique'               => 'El campo :attribute ya ha sido registrado.',
    'uploaded'             => 'Subir :attribute ha fallado.',
    'url'                  => ':Attribute debe ser una URL válida.',
    'uuid'                 => 'El campo :attribute debe ser un UUID válido.',
    'custom'               => [
        'email'    => [
            'unique' => 'El :attribute ya ha sido registrado.',
        ],
        'password' => [
            'min' => 'La :attribute debe contener más de :min caracteres',
        ],
    ],
    'glosas' =>[
        'validator_columns' =>'Error las siguientes columnas no existen en nuestra Base de Datos: ',
        'validator_columns_param' => 'Las siguientes columnas no existen en la base de datos: :invalid_columns',
        'error_table' => 'Error cargando registros de las tirillas.',
        'error_table_glosas' => 'Error cargando registros de las glosas.',
        'tipos_glosas_find' => 'Tipos de glosas Encontradas.',
        'tipos_glosas_error' => 'Error consultando Tipos de glosas.',
        'tipos_glosas_not_find' => 'Tipos de glosas no encontradas.',
        'tipo_glosa_find' => 'Tipo de glosa Encontrada.',
        'tipo_glosa_error' => 'Error consultando el tipo de glosa.',

        'glosas_especificas_find' => 'Tipos de glosas especificas Encontradas.',
        'glosas_especificas_error' => 'Error consultando Tipos de glosas especificas.',
        'glosas_especificas_not_find' => 'Tipos de glosas especificas no encontradas.',
        'glosa_especifica_find' => 'Tipo de glosa especifica Encontrada.',
        'glosa_especifica_error' => 'Error consultando el tipo de glosa especifica.',

        'glosas_generales_find' => 'Glosas generales encontradas.',
        'glosas_generales_error' => 'Error consultando Glosas generales.',
        'glosas_generales_not_find' => 'Glosas generales no encontradas.',

        'glosa_general_find' => 'Glosa general encontrada.',
        'glosa_general_error' => 'Error consultando Glosa general.',

        'soporte_tirilla_temp_error' => 'Error buscando soportes de la tirilla.',
        'soportes_encontrados' => 'Soportes encontrados.',
        'soporte_no_encontrados' => 'La tirilla no contiene soportes',

        'not_created' => 'Glosa NO creada.',
        'created' => 'Glosa creada correctamente.',
        'error_created' => 'Error creando la glosa contacte al administrador.',
        'glosa_exists' => 'Ya existe un glosa con este codigo para la tirilla o medicamento seleccionado.',
        'error_move_glosas' => 'Error moviendo las glosas nuevas.',


        'not_updated' => 'Glosa NO actualizada.',
        'updated' => 'Glosa actualizada correctamente.',
        'error_updated' => 'Error actualizando la glosa contacte al administrador.',
        'not_updated_state_glosa' => 'Error no se puede actualizar una glosa que contenga una respuesta.',

        'not_deleted' => 'Glosa NO  eliminada.',
        'not_deleted_pivot' => 'Glosa nueva eliminada pero su relacion de glosa nueva y anterior no encontrada ',
        'deleted' => 'Glosa eliminada correctamente.',
        'error_deleted' => 'Error eliminando la glosa contacte al administrador.',

        'not_restore' => 'Glosa ya se encuentrar restaurada.',
        'restore' => 'Glosa restaurada correctamente.',
        'error_restore' => 'Error restaurando la glosa contacte al administrador.',

        'not_close' => 'NO se puede cerrar la Tirilla',
        'close' => 'Tirilla cerrada correctamente, cantidad de glosas: %s, valor de glosas: %s',
        'error_close' => 'Error cerrando la tirilla contacte al administrador.',
        'info_close' => 'por el valor total de la tirilla',
        'info_close_error' => 'ERROR generando resumen',

        'not_date_init' => 'NO se puede almacenar  fecha de inicio del proceso',
        'date_init' => 'Fecha inicio registrada.',
        'error_date_init' => 'Error almacenando la fecha de inicio del proceso.',
        'exists_date_init' => 'Ya existe una fecha de inicio para el proceso actual',

        'not_unclose' => 'NO se puede retornar la Tirilla',
        'unclose' => 'Tirilla regresada correctamente',
        'error_unclose' => 'Error abriendo contacte al administrador.',
        'warning_close' => 'Acción no permitida: solo se pueden retornar tirilla que esten CERRADO (AUDITADA SIN GLOSA) u OBJETADA (AUDITADA CON GLOSA) y sus glosas no tengan respuestas',

        'not_find_glosa' => 'No existen registros para la glosa seleccionada.',
        'is_find_glosa' => 'Datos de la glosa encontrados',
        'error_find_glosa' => 'Error buscando datos de la glosa.',

        'tirilla_datos'=>[
            'is_find_general' => 'Datos generales encontrados',
            'not_find_general' => 'No existen datos generales para la tirilla seleccionada',
            'error_find_general' => 'Error buscando datos generales de la tirilla',
            'is_find_paciente' => 'Datos del paciente encontrados',
            'not_find_paciente' => 'No existen datos del paciente para la tirilla seleccionada',
            'error_find_paciente' => 'Error buscando datos del paciente de la tirilla',
            'is_find_medicamentos' => 'Datos de los medicamentos encontrados',
            'not_find_medicamentos' => 'No existen datos de los medicamentos para la tirilla seleccionada',
            'error_find_medicamentos' => 'Error buscando medicamentos de la tirilla',
            'is_find_medicamento' => 'Datos del medicamento encontrados',
            'not_find_medicamento' => 'No existen datos del medicamento para la tirilla seleccionada',
            'error_find_medicamento' => 'Error buscando  datos del medicamento de la tirilla',
            'is_find_glosas_automaticas' => 'Glosas automáticas encontradas',
            'not_find_glosas_automaticas' => 'No se generaron glosas automáticas.',
            'error_find_glosas_automaticas' => 'Error buscando glosas automáticas',

        ],

        'request' => [
            'close_tirilla' => 'La tirilla ya ha sido guardada o no esta lista para guardar.',
            'close_tirilla_not_exists' => 'No existen glosas para cerrar con los datos suministrados.',
            'store_tirilla_valor_medicamento' => 'El valor de la glosa no puede superar el valor del medicamento: %s',
            'store_tirilla_valor_tirilla' => 'El valor de la glosa no puede superar el valor de la tirilla: %s',
            'delete_glosa' => 'Error no se puede eliminar una glosa que contenga una respuesta o su tirilla este cerrada.',
            'store_medicamento_noexists' => 'El medicamento no pertenece a la tirilla.',
            'store_tirilla_exists' => 'No se puede almacenar la glosa, Tirilla en estado superior o cerrada.',
            'store_tirilla_state' => 'No se puede almacenar la glosa, Tirilla en estado inadecuado.',
            'store_medicamento_automatico' => 'La glosas ya existe como una glosa pero automática',
        ],
        'rules_invoke' => [
            'tipo_glosa' => 'La glosa nueva debe ser solo por medicamento.',
            'respuesta_glosa' => 'La respuesta de la glosa anterior debe ser GLOSA LEVANTADA.',
            'glosa_especifica' => 'El codigo de la nueva glosa especifica no debe ser igual a la anterior.',
            'medicamento' => 'El codigo del medicamento debe ser igual al medicamento de la glosa anterior.',
            'tipo_glosa_especifica' => 'El codigo del tipo de la glosa no coincide con el tipo de la glosa especifica.'
        ]

    ],
    'calidad' =>  [
        'not_created' => 'Respuesta de calidad NO creada.',
        'created' => 'Respuesta de calidad creada correctamente.',
        'error_created' => 'Error creando la respuesta de calidad contacte al administrador',
        'quality_answered' => 'La Tirilla ya ha sido respondida.'
    ]
];
