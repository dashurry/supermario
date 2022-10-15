<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
        </ul>
        </div>
      </div>
      @endif

      @if (session()->has('error'))
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ session()->get('error') }}
        </div>
      </div>
      @endif

      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          {{ session()->get('success') }}
        </div>
      </div>
      @endif

</div>