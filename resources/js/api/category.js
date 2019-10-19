let uri = '/api/category'
export default {
    store(formData, success, fail) {
        axios.post(uri + '/store', formData)
        .then(response => success(response.data))
        .catch(response => fail(response.data))
    },
    getAll(success, fail) {
        axios.get(uri + '/all')
        .then(response => success(response.data))
        .catch(response => fail(response.data))
    }
}