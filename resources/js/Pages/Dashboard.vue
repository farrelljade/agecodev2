<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <v-container>
            <v-row justify="center">
                <v-col cols="12" sm="8" md="6">
<!--                    <v-card v-for="post in posts" :key="post.id" class="mb-3">-->
                    <v-card class="mb-3">
                        <v-card-title class="d-flex align-center">
                            <v-avatar size="40" class="mr-3">
<!--                                <v-img :src="post.user.avatar" alt="User avatar"/>-->
                            </v-avatar>
                            <div>
<!--                                <div>{{ post.user.name }} @{{ post.user.handle }}</div>-->
                                <div>Mikel Farrell @farrelljade</div>
<!--                                <small class="text-subtitle-2">{{ post.time }}</small>-->
                                <small class="text-subtitle-2">11:42</small>
                            </div>
                        </v-card-title>

                        <v-card-text>
<!--                            {{ post.content }}-->
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec pur
                        </v-card-text>

                        <v-card-actions>
<!--                            <v-btn icon @click="likePost(post)"><v-icon>mdi-heart-outline</v-icon></v-btn>-->
<!--                            <v-btn icon @click="retweetPost(post)"><v-icon>mdi-repeat</v-icon></v-btn>-->
<!--                            <v-btn icon @click="replyToPost(post)"><v-icon>mdi-reply</v-icon></v-btn>-->
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>

    </AuthenticatedLayout>
</template>
