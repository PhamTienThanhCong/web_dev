const mongoose = require('mongoose');
const Schema = mongoose.Schema;

async function connect() {
    try {
        await mongoose.connect('mongodb+srv://cong:123@cluster0.gw8w2.mongodb.net/Khoa_Hoc?retryWrites=true&w=majority');
        console.log('Kết nối dữ liệu tới database thành công')
    } catch (error) {
        console.log('không thể Kết nối dữ liệu tới database')
    }
}

module.exports = connect();