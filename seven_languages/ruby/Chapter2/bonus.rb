puts "Introduce un número"
number = gets.to_i
rand = rand(10)
if number < rand 
    puts "El número indicado es menor que #{rand}"
elsif number > rand
    puts "El número indicado es mayor que #{rand}"
else
    puts "Bingo!!"
end
puts "El número aleatorio es #{rand}"

