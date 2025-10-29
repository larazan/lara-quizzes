<template>
    <div>
      <h1 class="text-2xl font-bold">{{ quiz.title }}</h1>
      <p class="text-gray-600">Score: {{ attempt.score }} / {{ attempt.max_score }}</p>
  
      <div v-for="q in quiz.questions" :key="q.id" class="my-4 p-4 border rounded">
        <p class="font-semibold">{{ q.question_text }}</p>
  
        <div v-for="opt in q.options" :key="opt.id">
          <span
            :class="[
              'block p-2 rounded mt-1',
              opt.is_correct ? 'bg-green-100' : '',
              userAnswer(q.id) === opt.id && !opt.is_correct ? 'bg-red-100' : ''
            ]"
          >
            {{ opt.label }}. {{ opt.text }}
          </span>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  const props = defineProps({ attempt: Object, quiz: Object })
  
  const userAnswer = (questionId) => {
    const ans = props.attempt.answers.find(a => a.question_id === questionId)
    return ans ? ans.option_id : null
  }
  </script>
  