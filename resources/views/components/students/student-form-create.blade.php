<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Criar aluno</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('students') }}">Alunos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Criar Aluno</li>
                </ol>
            </nav>
            <form method="POST" action="{{ url('students') }}">
                @csrf
                <div class="form-group">
                    <label for="atec_number" class="font-weight-bold">Número da atec</label>
                    <input
                        type="text"
                        id="atec_number"
                        name="atec_number"
                        autocomplete="atec_number"
                        placeholder="Número da atec"
                        class="form-control
                        @error('atec_number') is-invalid @enderror"
                        value="{{ old('atec_number') }}"
                        required
                        aria-describedby="atec_numberHelp">

                    @error('atec_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nome</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        autocomplete="name"
                        placeholder="Nome do aluno"
                        class="form-control
                        @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        required
                        aria-describedby="nameHelp">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birthdate" class="font-weight-bold">Data de nascimento</label>
                    <input
                        type="date"
                        id="birthdate"
                        name="birthdate"
                        autocomplete="birthdate"
                        placeholder="Data de nascimento"
                        max="{{now()->addYear(-14)->format('Y-m-d')}}"
                        class="form-control
                        @error('birthdate') is-invalid @enderror"
                        value="{{ old('birthdate') }}"
                        required
                        aria-describedby="birthdateHelp">

                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="group" class="font-weight-bold">Turma</label>
                    <div>
                        <select
                            id="group_id"
                            name="group_id[]"
                            class="form-select custom-select
                            @error('group') is-invalid @enderror"
                            aria-describedby="groupHelp">

                            @foreach($groups as $group)
                                <option value = " {{ $group->id }} ">
                                    {{ $group->name }}
                                </option>
                            @endforeach

                            @error('group')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </select>
                    </div>
                </div>

                <a href="{{ url('students') }}" class="mt-2 mb-5 btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Voltar</a>
                <button type="submit" class="mt-2 mb-5 btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-check2" viewBox="0 0 16 16">
                        <path
                            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Criar
                </button>
            </form>

        </div>
    </div>
</div>
