<script setup>
import Card from "../Components/CardQuiz.vue";
import PaginationLinks from "../Components/PaginationLinks.vue";
import InputField from "../Components/InputField.vue";
import { router, useForm } from "@inertiajs/vue3";

const params = route().params;

const props = defineProps({
    quizzes: Object,
    searchTerm: String,
});

const username = params.user_id ? props.quizzes.data.find(i => i.user_id === Number(params.user_id)).user.username : null;

const form = useForm({
    search: props.searchTerm,
});

const search = () => {
    router.get(route("quizzes"), {
        search: form.search,
        user_id: params.user_id,
        cat: params.cat,
    });
};
</script>

<template>
    <Head title="- Latest Quizzes" />

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <Link
                class="px-2 py-1 rounded-md bg-indigo-500 text-white flex items-center gap-2"
                v-if="params.cat"
                :href="route('quizzes', { ...params, cat: null, page: null })"
            >
                {{ params.cat }}
                <i class="fa-solid fa-xmark"></i>
            </Link>

            <Link
                class="px-2 py-1 rounded-md bg-indigo-500 text-white flex items-center gap-2"
                v-if="params.diff"
                :href="route('quizzes', { ...params, diff: null, page: null })"
            >
                {{ params.diff }}
                <i class="fa-solid fa-xmark"></i>
            </Link>

            <Link
                class="px-2 py-1 rounded-md bg-indigo-500 text-white flex items-center gap-2"
                v-if="params.search"
                :href="route('quizzes', { ...params, search: null, page: null })"
            >
                {{ params.search }}
                <i class="fa-solid fa-xmark"></i>
            </Link>

            <Link
                class="px-2 py-1 rounded-md bg-indigo-500 text-white flex items-center gap-2"
                v-if="params.user_id"
                :href="route('quizzes', { ...params, user_id: null, page: null })"
            >
                {{ username }}
                <i class="fa-solid fa-xmark"></i>
            </Link>
        </div>

        <div class="w-1/4">
            <form @submit.prevent="search">
                <InputField
                    type="search"
                    label=""
                    icon="magnifying-glass"
                    placeholder="Search..."
                    v-model="form.search"
                />
            </form>
        </div>
    </div>

    <div v-if="Object.keys(quizzes.data).length">
        <div class="grid grid-cols-3 gap-4">
            <div v-for="quiz in quizzes.data" :key="quiz.id">
                <Card :quiz="quiz" />
            </div>
        </div>

        <div class="mt-8">
            <PaginationLinks :paginator="quizzes" />
        </div>
    </div>
    <div v-else>There are no quizzes</div>
</template>
