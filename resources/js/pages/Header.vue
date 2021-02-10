<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
<!--                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>-->
                        <router-link to="/" class="btn btn-primary">Home <span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/add" class="btn btn-primary float-right">Add new</router-link>
                    </li>

                </ul>

            </div>
        </nav>
    </main>
</template>

<script>
    export default {

    }
</script>
