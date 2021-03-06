<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\GimnastaRequest as StoreRequest;
use App\Http\Requests\GimnastaRequest as UpdateRequest;

class GimnastaCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Gimnasta');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/gimnasta');
        $this->crud->setEntityNameStrings('gimnasta', 'gimnastas');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        // Filter for Torneo
        $this->crud->addFilter([ // select2_multiple filter
            'name' => 'torneo',
            'type' => 'select2_multiple',
            'label'=> 'Torneos'
          ], function() { // the options that show up in the select2
              return \App\Models\Torneo::all()->pluck('nombre', 'id')->toArray();
          }, function($values) { // if the filter is active
              foreach (json_decode($values) as $key => $value) {
                  $this->crud->query = $this->crud->query->whereHas('torneos', function ($query) use ($value) {
                      $query->where('torneo_id', $value);
                  });
              }
          });
        

        // ------ CRUD FIELDS

        // Campos automaticos, se generan automaticamente dependiendo de como este la table de bd
        $this->crud->setFromDb();

        // Gimnasio
        $this->crud->addField([  // Select con busqueda
            'label' => "Gimnasio",
            'type' => 'select2',
            'name' => 'gimnasio_id', // the db column for the foreign key
            'entity' => 'gimnasio', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Gimnasio" // foreign key model
        ], 'update/create/both');

        // Fecha de nacimiento
        $this->crud->addField([   // date picker
            'name' => 'fecha_nacimiento',
            'type' => 'date_picker',
            'label' => 'Fecha de Nacimiento',
            // optional:
            'date_picker_options' => [
               'todayBtn' => false,
               'format' => 'dd-mm-yyyy',
               'language' => 'es'
            ],
         ], 'update/create/both');
        
        // Nivel
        $this->crud->addField([  // Select
            'label' => "Nivel",
            'type' => 'select2',
            'name' => 'nivel_id', // the db column for the foreign key
            'entity' => 'nivel', // the method that defines the relationship in your Model
            'attribute' => 'nivel', // foreign key attribute that is shown to user
            'model' => "App\Models\Nivel" // foreign key model
        ], 'update/create/both');

        // Rango de edad
        $this->crud->addField([  // Select
            'label' => "Rango de Edad",
            'type' => 'select2',
            'name' => 'rango_id', // the db column for the foreign key
            'entity' => 'rango', // the method that defines the relationship in your Model
            'attribute' => 'rango', // foreign key attribute that is shown to user
            'model' => "App\Models\Rango" // foreign key model
        ], 'update/create/both');

        // Los torneos
        $this->crud->addField([
            // n-n relationship (with pivot table)
            'label' => "Torneos", // Table column heading
            'type' => "select2_multiple",
            'name' => 'torneos', // the method that defines the relationship in your Model
            'entity' => 'torneos', // the method that defines the relationship in your Model
            'attribute' => "nombre", // foreign key attribute that is shown to user
            'model' => "App\Models\Torneo", // foreign key model
        ]);

        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS

        // Relacionar los gimnasios
        $this->crud->setColumnDetails('gimnasio_id',[
            'label' => "Gimnasio", // Table column heading
            'type' => 'select',
            'name' => 'gimnasio_id', // the db column for the foreign key
            'entity' => 'gimnasio', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Gimnasio" // foreign key model
        ]);
        
        // Relacionar los rangos de Edad
        $this->crud->setColumnDetails('rango_id',[
            'label' => "Rango de edad", // Table column heading
            'type' => 'select',
            'name' => 'rango_id', // the db column for the foreign key
            'entity' => 'rango', // the method that defines the relationship in your Model
            'attribute' => 'rango', // foreign key attribute that is shown to user
            'model' => "App\Models\Rango" // foreign key model
        ]);

        // Relacionar los niveles
        $this->crud->setColumnDetails('nivel_id',[
            'label' => "Nivel", // Table column heading
            'type' => 'select',
            'name' => 'nivel_id', // the db column for the foreign key
            'entity' => 'nivel', // the method that defines the relationship in your Model
            'attribute' => 'nivel', // foreign key attribute that is shown to user
            'model' => "App\Models\Nivel" // foreign key model
        ]);


        // Remover el id del torneo, porque no es necesario
        $this->crud->removeColumn('torneo_id'); 

        // Columna para mostrar los torneos
        $this->crud->addColumn([
            // n-n relationship (with pivot table)
            'label' => "Torneos", // Table column heading
            'type' => "select_multiple",
            'name' => 'torneos', // the method that defines the relationship in your Model
            'entity' => 'torneos', // the method that defines the relationship in your Model
            'attribute' => "nombre", // foreign key attribute that is shown to user
            'model' => "App\Models\Torneo", // foreign key model
        ]);

        // Columna para accesar los resultados de la gimnasta
        $this->crud->addColumn([
            // run a function on the CRUD model and show its return value
            'name' => "resultados",
            'label' => "Resultados", // Table column heading
            'type' => "model_function",
            'function_name' => 'getResultadosLink', // the method in your Model
            ]);

        $this->crud->enableExportButtons();
        // $this->crud->addField([  // Select
        //     'label' => "Torneo",
        //     'type' => 'select',
        //     'name' => 'torneo_id', // the db column for the foreign key
        //     'entity' => 'torneo', // the method that defines the relationship in your Model
        //     'attribute' => 'fecha', // foreign key attribute that is shown to user
        //     'model' => "App\Models\Torneo" // foreign key model
        // ], 'update/create/both');
        // $this->crud->setColumnDetails('gimnasio_id', ['attribute' => 'value']);
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
