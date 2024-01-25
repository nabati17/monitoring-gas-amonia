        fetch('/api/getGasLevels')
            .then(response => response.json())
            .then(data => {
                // Check if gasLevels array is present and not empty
                if (data.gasLevels && data.gasLevels.length > 0) {
                    const gasLevel = data.gasLevels[0].gas_level / 100;

                    // Update the progress bar value
                    var semiBar = new ProgressBar.SemiCircle("#semi-container", {
                        color: gasLevel <= 0.3 ? "green" : (gasLevel <= 0.7 ? "yellow" : "red"),
                        strokeWidth: 2,
                        trailWidth: 8,
                        trailColor: "black",
                        easing: "bounce",
                        from: {
                            color: "#FF0099",
                            width: 1
                        },
                        to: {
                            color: "#FF9900",
                            width: 2
                        },
                        text: {
                            value: '0',
                            className: 'progress-text',
                            style: {
                                color: 'black',
                                position: 'absolute',
                                top: '50%', // Adjusted top position for centering
                                left: '50%',
                                padding: 0,
                                margin: 0,
                                transform: 'translate(-50%, -50%)', // Center the text
                                fontSize: '50px'
                            }
                        },
                        step: (state, shape) => {
                            shape.path.setAttribute("stroke", state.color);
                            shape.path.setAttribute("stroke-width", state.width);
                            shape.setText(Math.round(shape.value() * 100) + ' ppm');
                        }
                    });

                    semiBar.animate(gasLevel, {
                        duration: 2000
                    });

                    // Update the color indicators based on gas level
                    var redIndicator = document.getElementById('red-indicator');
                    var yellowIndicator = document.getElementById('yellow-indicator');
                    var greenIndicator = document.getElementById('green-indicator');

                    // Remove existing classes
                    redIndicator.classList.remove('red-indicator');
                    yellowIndicator.classList.remove('yellow-indicator');
                    greenIndicator.classList.remove('green-indicator');

                    // Add new classes based on gas level
                    if (gasLevel <= 0.3) {
                        greenIndicator.classList.add('green-indicator');
                    } else if (gasLevel <= 0.7) {
                        yellowIndicator.classList.add('yellow-indicator');
                    } else {
                        redIndicator.classList.add('red-indicator');
                    }
                } else {
                    // Set the progress bar value to 0 if no data is available
                    var semiBar = new ProgressBar.SemiCircle("#semi-container", {
                        color: "green", // Set color to green for 0 value
                        strokeWidth: 2,
                        trailWidth: 8,
                        trailColor: "black",
                        easing: "bounce",
                        from: {
                            color: "#FF0099",
                            width: 1
                        },
                        to: {
                            color: "#FF9900",
                            width: 2
                        },
                        text: {
                            value: '0',
                            className: 'progress-text',
                            style: {
                                color: 'black',
                                position: 'absolute',
                                top: '50%', // Adjusted top position for centering
                                left: '50%',
                                padding: 0,
                                margin: 0,
                                transform: 'translate(-50%, -50%)', // Center the text
                                fontSize: '50px'
                            }
                        },
                        step: (state, shape) => {
                            shape.path.setAttribute("stroke", state.color);
                            shape.path.setAttribute("stroke-width", state.width);
                            shape.setText('0 ppm');
                        }
                    });
                }
            })
            .catch(error => console.error('Error fetching gas level data:', error));