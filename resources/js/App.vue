<template>
    <div>
        <app-nav></app-nav>
        <transition>
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </transition>
    </div>
</template>
<script>
import AppNav from './components/Navbar'
export default {
    components: {
        AppNav
    },
    mounted() {
        console.log('App mounted')
    }
}
</script>