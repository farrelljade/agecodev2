<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const auth = page.props.auth;

console.log(page.props.auth);
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

            <Link v-if="auth && auth.user" :href="route('users.show', { user: auth.user.id })">
                <v-list-item class="mt-2" prepend-icon="mdi-account" link title="Profile"></v-list-item>
            </Link>
        </v-navigation-drawer>

        <v-navigation-drawer width="800" location="right">
            <v-list>
                <v-list-item title="Drawer right"></v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
            <slot />
        </v-main>
    </v-layout>
</template>
