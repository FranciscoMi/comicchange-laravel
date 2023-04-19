<?php ?>
<form name="form_users" id="formAccessUsers" action="" method="GET" class="main-screen margin-top__50">
<section>
    <!--Si no hay usuarios pone un título-->
    @if($users->isEmpty())
    <h2 class=" title--komika title--komika__big">Esto está un poco vacio.<br>No hay usuarios</h2>
    @else

    <table id="tableUsers" class="text--Komika text--center table">
        <tr><td colspan="2"></td>
            <td>
                <div class="input__search">
                <input type="search" name="search_Role" id="searchRole" class="input__search--border-no">
                <button class="btn btn--search btn--blue">
                    <i class="fa-solid fa-magnifying-glass" style="color: #edee56;"></i>
                </button>
                </div>
            </td>
            <td>
                <div class="input__search">
                <input type="search" name="search_Alias" id="searchAlias" class="input__search--border-no">
                <button class="btn btn--search btn--blue">
                    <i class="fa-solid fa-magnifying-glass" style="color: #edee56;"></i>
                </button>
                </div>
            </td>
            <td>
                <div class="input__search">
                <input type="search" name="search_Mail" id="searchMail" class="input__search--border-no">
                <button class="btn btn--search btn--blue">
                    <i class="fa-solid fa-magnifying-glass" style="color: #edee56;"></i>
                </button>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2"><span class="space"></span></td>
            <td class="btn btn--grey card"><a>Role</a></td>
            <td class="btn btn--grey card"><a>Alias</a></td>
            <td class="btn btn--grey card"><a>Mail</a></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="3"><hr class="line"></td></tr>
        @foreach ($users as $newuser )
        <tr class="table-row">
            <td>
                <a class="btn" href="#">
                    <i class="fa-solid fa-trash-can fa-xl" style="color:#D22626"></i>
                </a>
            </td>
            <td><a><input type="radio" name="user-radio" value="{{$newuser->id}} "class="input__short"></a></td>
            <td>{{$newuser->id}}</td>
            <td>{{$newuser->name}}</td>
            <td>{{$newuser->email}}</td>
        </tr>
        @endforeach
        @endif
    </table>
</section>
</form>
