import axios from 'axios'

// TOKEN YSqXe8KJiHfx3Z9MGaoic0heLIZ0ifv9ZODV30r0
const apiClient = axios.create({
    baseURL: 'http://casteaching.test/api',
    withCredentials: true,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
        Authorization: 'Bearer YSqXe8KJiHfx3Z9MGaoic0heLIZ0ifv9ZODV30r0'
    }
})

export default {
    videos: async function() {
        const response = await apiClient.get('/videos')
        return response.data
    },
    video: {
        show: async function(id) {
            const response = await apiClient.get('/videos/' + id)
            return response.data
        },
        create: async function(data) {
            const response = await apiClient.post('/videos',data)
            return response.data
        },
        update: async function(id, data) {
            const response = await apiClient.put('/videos/' + id,data)
            return response.data
        },
        destroy: async function(id) {
            const response = await apiClient.delete('/videos/' + id)
            return response.data
        },
    }
}

