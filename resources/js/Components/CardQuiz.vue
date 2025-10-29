<script setup>
import { router } from "@inertiajs/vue3";

const params = route().params;

defineProps({
    quiz: Object,
});

const selectUser = (id) => {
    router.get(route("quizzes"), {
        user_id: id,
        search: params.search,
        cat: params.cat,
    });
};

const selectCat = (cat) => {
    router.get(route("quizzes"), {
        user_id: params.user_id,
        search: params.search,
        cat: cat,
    });
};

const selectLevel = (diff) => {
    router.get(route("quizzes"), {
        user_id: params.user_id,
        search: params.search,
        diff: diff,
    });
};
</script>

<template>
    <div
        class="bg-white rounded-lg shadow-lg overflow-hidden dark:bg-slate-800 h-full flex flex-col justify-between"
    >
        <div>
            <!-- Image -->
            <Link :href="route('quizzes.show', quiz.id)">
                <img
                    :src="
                        quiz.image
                            ? `/storage/${quiz.image}`
                            : '/storage/images/quiz/default.jpg'
                    "
                    class="w-full h-48 object-cover object-center bg-slate-300"
                    alt=""
                />
            </Link>
            <!-- Category -->
            <div class="flex items-center justify-between gap-3 px-4 pt-4">
                <button
                    @click="selectCat(quiz.category.id)"
                    class="bg-slate-500 text-white px-2 py-px rounded-full hover:bg-slate-700 dark:hover:bg-slate-900"
                >
                    {{ quiz.category.name }}
                </button>
                <button
                    @click="selectLevel(quiz.difficulty)"
                    class="bg-orange-400 text-white px-2 py-px rounded-full hover:bg-orange-500 dark:hover:bg-orange-700"
                >
                    {{ quiz.difficulty }}
                </button>
            </div>
            <!--  difficulty -->
            <div class="flex items-center justify-between px-3 pt-4">
                <div class="flex space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <span>{{ quiz.time_limit_seconds }} s</span>
                </div>
                <div class="flex space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
</svg>

                    <span>{{ quiz.questions_count }}</span>
                </div>
            </div>
            <!-- Title & user -->
            <div class="p-4">
                <h3 class="font-bold text-lg mb-2">
                    {{ quiz.title }}
                </h3>
                <p>
                    {{ quiz.description }}
                </p>
                <p class="text-sm font-semibold">
                    Listed on
                    {{ new Date(quiz.created_at).toLocaleDateString() }} by
                    <button
                        class="text-link"
                        @click="selectUser(quiz.user.id)"
                    >
                        {{ quiz.user.username }}
                    </button>
                </p>
            </div>
        </div>
        
    </div>
</template>
