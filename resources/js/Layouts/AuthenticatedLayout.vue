<script setup>
import {Link, usePage, useForm} from '@inertiajs/vue3';
import {route} from 'ziggy-js';
import {ref} from "vue";
import NewPostDialog from '@/Pages/Posts/Components/NewPostDialog.vue';

const page = usePage();
const auth = page.props.auth;
const logoutForm = useForm({});
const openDialog = ref(false);

function handleLogout() {
    logoutForm.post(route('logout'), {
        onSuccess: () => {
            window.location = route('login');
        },
    });
}

function createPost() {
    openDialog.value = true;
}
</script>

<template>
    <v-layout>
        <!-- Left Navigation Drawer -->
        <v-navigation-drawer
            class="d-flex flex-column"
            width="250"
            style="background: linear-gradient(to bottom, #1E1E1E, #121212); border-right: 2px solid rgba(255, 255, 255, 0.1);"
        >
            <v-list>
                <v-list-item
                    class="mt-6"
                    prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
                    style="color: rgba(255, 255, 255, 0.8);"
                    :subtitle="auth.user.name"
                    :title="'@' + auth.user.handle"
                ></v-list-item>
            </v-list>

            <v-divider></v-divider>

            <!-- Top Section -->
            <Link :href="route('posts.index')">
                <v-list-item
                    class="mt-6"
                    style="color: rgba(255, 255, 255, 0.8);"
                    prepend-icon="mdi-home-outline"
                    link
                    title="Home"
                ></v-list-item>
            </Link>

            <Link v-if="auth && auth.user" :href="route('users.show', { user: auth.user.id })">
                <v-list-item
                    style="color: rgba(255, 255, 255, 0.8);"
                    prepend-icon="mdi-account-outline"
                    link
                    title="Profile"
                ></v-list-item>
            </Link>

            <v-btn
                block
                @click="createPost"
                color="info"
                prepend-icon="mdi-pencil-outline"
                style="color: rgba(255, 255, 255, 0.8);"
            >
                New Post
            </v-btn>

            <v-btn
                block
                color="error"
                prepend-icon="mdi-logout"
                @click="handleLogout"
                style="color: rgba(255, 255, 255, 0.8);"
            >
                Logout
            </v-btn>
        </v-navigation-drawer>

        <!-- Right Navigation Drawer -->
        <v-navigation-drawer
            width="800"
            location="right"
            style="background: #1E1E1E; border-left: 2px solid rgba(255, 255, 255, 0.1);"
        >
            <v-list>
                <v-list-item title="Drawer right"></v-list-item>
            </v-list>
        </v-navigation-drawer>

        <!-- Main Content -->
        <v-main
            class="d-flex align-center justify-center"
            style="background: #121212; border: 2px solid rgba(255, 255, 255, 0.1); min-height: 300px;"
        >
            <slot />
        </v-main>

        <NewPostDialog v-model="openDialog" />
    </v-layout>
</template>
