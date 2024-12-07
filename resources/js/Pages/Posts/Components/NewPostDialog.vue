<script setup>
import {useForm} from "@inertiajs/vue3";
import {route} from "ziggy-js";

const emit = defineEmits(['update:modelValue']);

const form = useForm({
    content: '',
});

function closeModal() {
    emit('update:modelValue', false);
}

function submitPost() {
    // Submit the form
    form.post(route('posts.store'), {
        onSuccess: () => {
            // reset the form
            form.reset();
            closeModal();
        },
    });
}
</script>

<template>
    <v-dialog :model-value max-width="600">
        <v-card style="background: linear-gradient(to bottom, #1E1E1E, #121212); border-right: 2px solid rgba(255, 255, 255, 0.1);">
            <form @submit.prevent="submitPost">
                <v-card-text style="text-decoration: none; color: rgba(255,255,255,0.4);">
                    <v-textarea
                        v-model="form.content"
                        label="What's happening..."
                        required
                        rows="5"
                        counter="255"
                    ></v-textarea>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn variant="text" color="error" @click="closeModal">Cancel</v-btn>
                    <v-btn style="color: rgba(255,255,255,0.4);" @click="submitPost">Post</v-btn>
                </v-card-actions>
            </form>
        </v-card>
    </v-dialog>
</template>
