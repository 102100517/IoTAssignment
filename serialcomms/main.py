import json
import serial
import pymongo

def main():
    try:
        arduino = serial.Serial(port='/dev/ttyACM0',baudrate='115200')
        print('[*]arduino connected')
    except:
        print('[!]arduino not found, exit')
        return

    try:
        client = pymongo.MongoClient("mongodb://localhost:27017")
        #db = client.mydb
        collection = client['mydb']['smartcar']
        print('[*]mongodb connected')
    except:
        print('[!]mongodb not found, cant connect')
        return
    
    while True:
        try:

            info = json.loads(arduino.readline())
            collection.update({"car" : "golf"}, {'$set' : {'OilTemp' : info['oil'],'EngineLoad' : info['engine'], 'RPM' : info['rpm'], 'Voltage' : info['volt']}})
            print(collection.find_one())
        except(json.decoder.JSONDecodeError, UnicodeDecodeError):
            print('[!]can\'t parse json data will try next cycle')

if __name__ == '__main__':
    main()
