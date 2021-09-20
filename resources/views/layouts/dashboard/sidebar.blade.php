<!-- Sidebar -->
<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
      <img
        src="{{ asset('images/logo-himakom.png') }}"
        alt=""
        class="my-4 mx-4"
        width="150px"
      />
    </div>
    <div class="list-group list-group-flush">
      <a
        href="/items"
        class="list-group-item list-group-item-action {{ $title == 'Barang' ? 'active' : '' }}"
        >Barang
      </a>
      <a
        href="/rooms"
        class="list-group-item list-group-item-action {{ $title == 'Ruangan' ? 'active' : '' }}"
        >Ruangan
      </a>
      @if (auth()->user()->role_id !== 3)
      @if (auth()->user()->role_id == 2)
          
      <a
        href="/users"
        class="list-group-item list-group-item-action {{ $title == 'User' ? 'active' : '' }}"
        >Staff
      </a>
      @else
      <a
        href="/users"
        class="list-group-item list-group-item-action {{ $title == 'User' ? 'active' : '' }}"
        >User
      </a>

      @endif
      
      <a
        href="/categories"
        class="list-group-item list-group-item-action {{ $title == 'Kategori' ? 'active' : '' }}"
        >Kategori
      </a>
      @endif
      @if (auth()->user()->role_id == 1)
        <a
          href="/roles"
          class="list-group-item list-group-item-action {{ $title == 'Role' ? 'active' : '' }}"
          >Role
        </a>
      @endif
    </div>
  </div>
  <!-- End Sidebar -->