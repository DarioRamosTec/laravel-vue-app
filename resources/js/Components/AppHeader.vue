<script setup>
    import Logo from '@/Components/AppLogo.vue';
</script>

<template>
    <header>
        <div class="px-3 py-2 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none">
                        <Logo style="width: 64px; height: 64px;"></Logo>
                    </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                    <a href="#" class="nav-link text-secondary">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg>
                        Home
                    </a>
                    </li>
                    <li>
                    <a href="#" class="nav-link">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"></use></svg>
                        Dashboard
                    </a>
                    </li>
                    <li>
                    <a href="#" class="nav-link">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"></use></svg>
                        Orders
                    </a>
                    </li>
                    <li>
                    <a href="#" class="nav-link">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"></use></svg>
                        Products
                    </a>
                    </li>
                    <li>
                    <a href="#" class="nav-link">
                        <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"></use></svg>
                        Customers
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </header>
</template>