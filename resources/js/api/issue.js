let uri = '/api/issue'
export default {
    store(formData, success, fail) {
        axios.post(uri + '/store', formData)
        .then(response => success(response.data))
        .catch(response => fail(response.data))
    },
    getAll(success, fail) {
        axios.post(uri + '/all', formData)
        .then(response => success(response.data))
        .catch(response => fail(response.data))
    }
}