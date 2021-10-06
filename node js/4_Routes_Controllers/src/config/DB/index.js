const mongoose = require('mongoose');

async function connet() {

    try {
        await mongoose.connect('mongodb://localhost:27017/f8_education');
        console.log('done connecting!!!')
    } catch (error) {
        console.log('fail connecting :((')
    }

}

module.exports = {connet};