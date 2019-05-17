import json
import serial
import pymongo

def main():
    try:
        arduino = serial.Serial('/dev/ttyACM0',9600)
        print('[*]arduino connected')
    except:
        print('[!]arduino not found, exit')
        return

    try:
        client = pymongo.MongoClient()
        db = client.mydb
        collection = db.smartcar
        print('[*]mongodb connected')
    except:
        print('[!]mongodb not found, cant connect')
        return
    
    while True:
        try:
            serialInfo = json.loads(arduino.readline())
            collection.updateone({},{ '$set' : { 'RPM' : info['rpm'], 'engine_load': info['load']}})
            print(collection.find_one())
        except(json.decoder.JSONDecodeError, UnicodeDecodeError):
            print('[!]can\'t parse json data will try next cycle')


if __name__ == '__main__':
    main()