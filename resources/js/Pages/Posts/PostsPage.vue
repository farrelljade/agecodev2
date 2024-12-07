<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { format } from 'date-fns';

defineProps({
    posts: {
        type: Array,
        required: true,
    },
});

function formattedDate(date) {
    return format(new Date(date), 'dd MMM yyyy, HH:mm');
}
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <v-container>
            <v-row>
                <v-col cols="12">
                    <v-card
                        v-for="post in posts"
                        :key="post.id"
                        class="mb-3"
                        style="background: linear-gradient(to bottom, #1E1E1E, #121212); border-right: 2px solid rgba(255, 255, 255, 0.1);"
                    >
                        <v-card-title class="d-flex align-center">
                            <v-avatar size="40" class="mr-3">
                                 <v-img src="https://randomuser.me/api/portraits/women/85.jpg" alt="User avatar"/>
                            </v-avatar>
                                <v-card-text>
                                    <Link
                                        :href="route('users.show', { user: post.user.id })"
                                        style="text-decoration: none; color: rgba(255,255,255,0.4);"
                                    >
                                        {{ post.user.name }} @{{ post.user.handle }}
                                    </Link>
                                </v-card-text>
                            <!-- will have 3 dots here for more options -->
                        </v-card-title>

                        <v-card-text
                            style="text-decoration: none; color: rgba(255,255,255,0.4);"
                        >
                            {{ post.content }} - <small class="text-subtitle-2">{{ formattedDate(post.created_at) }}</small>
                        </v-card-text>

                        <v-card-actions>
                            <v-btn style="text-decoration: none; color: rgba(255,255,255,0.4);" @click="likePost(post)"><v-icon>mdi-heart-outline</v-icon></v-btn>
                            <v-btn style="text-decoration: none; color: rgba(255,255,255,0.4);" @click="retweetPost(post)"><v-icon>mdi-repeat</v-icon></v-btn>
                            <v-btn style="text-decoration: none; color: rgba(255,255,255,0.4);" @click="replyToPost(post)"><v-icon>mdi-reply</v-icon></v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>

    </AuthenticatedLayout>
</template>
