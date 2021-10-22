<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Mostrar Aluno</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('groups') }}">Turmas</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('students') }}">Alunos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$student->name}}</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('students/' . $student->id) }}">
                @csrf

                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Nr Atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        readonly
                        class="form-control"
                        value="{{ $student->atec_number }}">
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        readonly
                        class="form-control"
                        value="{{ $student->name }}">
                </div>

                <div class="form-group">
                    <label for="group" class="font-weight-bold">Turma</label>
                    @foreach($student->groups as $group)
                        <input
                            type="text"
                            id="group"
                            name="group"
                            readonly
                            class="form-control"
                            value="{{ $group->name}}">
                    @endforeach
                </div>

                @if(sizeof($student->tests) > 0)
                    <table class="table table-striped table-bordered m-4 mx-auto">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nome do teste</th>
                            <th scope="col">Tema do teste</th>
                            <th scope="col">Notas</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($student->tests as $test)
                            <tr class="text-center">
                                <th scope="row">{{$test->id}}</th>
                                <td>{{$test->name}}</td>
                                <td>{{$test->subject}}</td>
                                @if($test->pivot->evaluation < 9.5)
                                    <td class="text-danger">{{$test->pivot->evaluation}}</td>
                                @else
                                    <td class="text-success">{{$test->pivot->evaluation}}</td>
                                @endif
                                <td class="text-center align-middle">
                                    <div class="pr-1">
                                        <form action="{{ url('tests/' . $test->id) }}" method="POST">
                                            <a href="{{ url('tests/' . $test->id) }}" type="button"
                                               class="btn btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                                Mostrar</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted h1 p-5">
                        Sem Testes associados
                    </p>
                @endif
                <a href="{{ url('students') }}" class="mt-2 mb-5 btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Voltar</a>
            </form>



            @if(sizeof($userform) == 1)

                <table class="table table-striped table-bordered m-4 mx-auto">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Colaborador</th>
                            <th scope="col">Data de criação</th>
                            <th scope="col">Periocidade</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="text-center">
                            <th scope="row">{{$userform[0]->id}}</th>
                            <th scope="row">{{$userform[0]->user_id}}</th>
                            <td>{{$userform[0]->date}}</td>
                            <td>{{$userform[0]->periodicity}}</td>
                            <td class="text-center align-middle">
                                <div class="pr-1">
                                    <form action="{{ url('userForms/' . $userform[0]->id) }}" method="POST">
                                        <a href="{{ url('userForms/' . $userform[0]->id) }}" type="button"
                                           class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                            Mostrar</a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @else
                <a href="{{ url('userForms/create/'. $student->id)}}" class="mt-2 mb-5 btn btn-secondary">
                    Criar ficha de utente
                </a>
            @endif
        </div>
    </div>
</div>
