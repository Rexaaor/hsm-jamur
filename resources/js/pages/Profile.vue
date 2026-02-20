<template>
  <MainLayout>
    <div class="min-h-screen bg-gray-50 py-16">
      <div class="max-w-3xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Profil Admin</h1>

        <div class="bg-white rounded-2xl shadow-md p-8">
          <form @submit.prevent="submit">
            <!-- Nama -->
            <div class="mb-6">
              <label class="block text-gray-700 font-medium mb-2">Nama</label>
              <input
                v-model="form.name"
                type="text"
                class="w-full border border-gray-300 text-gray-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 outline-none"
              />
            </div>

            <!-- Email (readonly) -->
            <div class="mb-6">
              <label class="block text-gray-700 font-medium mb-2">Email</label>
              <input
                v-model="form.email"
                type="email"
                disabled
                class="w-full border border-gray-200 bg-gray-100 rounded-lg px-4 py-2 text-gray-500 cursor-not-allowed"
              />
            </div>

            <!-- No WhatsApp -->
            <div class="mb-6">
              <label class="block text-gray-700 font-medium mb-2">No WhatsApp</label>
              <input
                v-model="form.no_wa"
                type="text"
                placeholder="628xxxxxxxxxx"
                class="w-full border border-gray-300 text-gray-500 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 outline-none"
              />
            </div>

            <!-- Password -->

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Password Lama</label>
                <input
                    v-model="form.current_password"
                    type="password"
                    placeholder="Masukkan password lama"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 outline-none"
                />
                <p v-if="form.errors.current_password" class="text-red-500 text-sm mt-1">
                    {{ form.errors.current_password }}
                </p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Password Baru</label>
                <input
                    v-model="form.password"
                    type="password"
                    placeholder="Minimal 8 karakter"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 outline-none"
                />
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Konfirmasi Password Baru</label>
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    placeholder="Ulangi password baru"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 outline-none"
                />
                <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">
                    {{ form.errors.password }}
                </p>
            </div>



            <!-- Updated at -->
            <p class="text-sm text-gray-500 mb-6">
            Terakhir diperbarui: {{ formattedUpdatedAt }}
            </p>


            <button
              type="submit"
              class="bg-green-700 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-800 transition"
            >
              Simpan Perubahan
            </button>
          </form>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue'
import { useForm, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const { props } = usePage()

const form = useForm({
  name: props.user.name,
  email: props.user.email,
  no_wa: props.user.no_wa,
  current_password: '',
  password: '',
  password_confirmation: ''
})


const formattedUpdatedAt = computed(() => {
  if (!props.user.updated_at) return '-'

  const date = new Date(props.user.updated_at)

  return date.toLocaleDateString('id-ID', {
    day: '2-digit',
    month: 'long',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
})

const submit = () => {
  form.put('/profile')
}
</script>

