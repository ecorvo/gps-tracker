# Simple GPS-tracker
This is a simple GPS tracking device using Linkit One Board (Twilio Hackpack).
USing Twilio Programmable Wireless and a Linkit One board, you can send an SMS to a phone number
and get back coordinates with map of where the device is located.

1. SMS triggers commands to Programmable Wireless
2. Device interprets command
3. Using GPS devices acquires its position's coordinates
4. GET request is sent back to a receiving endpoint with coordinates and the initial SMS number
5. Coordinates are parsed into a map with pin using Google Map API and an SMS is sent back to the initial sender.
