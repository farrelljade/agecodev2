<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { format } from 'date-fns';

defineProps({
    user: {
        type: Object,
        required: true,
    },
});

function formattedDate(date) {
    return format(new Date(date), 'dd MMM yyyy, HH:mm');
}
</script>

<template>
    <Head :title="user.name" />

    <AuthenticatedLayout>

    </AuthenticatedLayout>
</template>
