const mongoose = require('mongoose');
process.env.SUPPRESS_NO_CONFIG_WARNING = 'y';
const config = require('config');
const db = config.get('mongodb+srv://BeCong:cong123@course-name.lghtx.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');

async function connet() {
    try {
        await mongoose.connect('mongodb://localhost:27017/Khoa_Hoc')
        console.log('Done Connetion !!!')
    } catch (error) {
        console.log('Fail Connetion :((')
    }
}

module.exports = { connet }
