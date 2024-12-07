<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <v-layout>
        <v-navigation-drawer
            class="d-flex align-center justify-center"
            width="250"
        >
        <Link :href="route('posts.index')">
            <v-list-item class="mt-6" prepend-icon="mdi-home" link title="Home"></v-list-item>
        </Link>
        <Link href="#">
            <v-list-item class="mt-2" prepend-icon="mdi-account" link title="Profile"></v-list-item>
        </Link>
        </v-navigation-drawer>

        <v-navigation-drawer width="500" location="right">
            <v-list>
                <v-list-item title="Drawer right"></v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
            <slot />
        </v-main>
    </v-layout>
</template>
