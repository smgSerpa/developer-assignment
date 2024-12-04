# Developer Assignment

## Description

This project is a homework assignment for PHP developers.  
The goal is to create a system that integrates with the NORD Pool API to collect and store electricity prices, and expose this data via API endpoints.

The system should:
1. Collect daily electricity prices from the NORD Pool API and store them in the database.
2. Provide an API endpoint to show the collected prices with a custom markup applied (e.g., multiplied by a specified value).
3. Use **deliveryArea = LV** and **currency = EUR** for all API calls to fetch prices.

---

## Requirements

### Core Functionality:
1. **Authentication System**
   - Implement a functioning login form with fields for username and password:
      - Display error messages if the authentication fails or required parameters are missing.
      - Upon successful login, redirect the user to a view displaying stored data (read-only), as described in the **CRUD Interface** requirement.
   - Secure the API endpoints by requiring authentication.

2. **Data Collection**
   - Fetch daily electricity prices from the NORD Pool API:
      - **API URL:**  
        `https://dataportal-api.nordpoolgroup.com/api/DayAheadPrices?date=2024-12-04&deliveryArea=LV&currency=EUR`
      - Ensure that `deliveryArea` is always `LV` and `currency` is always `EUR`.
   - Automate the daily data collection process.

3. **API Endpoints**
   - Provide the following endpoints:
      - **Our** electricity price for the current hour (Europe/Riga Timezone).
      - **Our** electricity price for the next hour (Europe/Riga Timezone).

4. **Price Markup**
   - The system must calculate and provide prices using a constant multiplier specified in the configuration before returning them via the API.

5. **CRUD Interface** (Read-Only)
   - Display the collected data in a table, accessible only after authentication.

---

### Bonus Points:
- Visualize historical data in a user-friendly format (e.g., a table or chart).
- Document the API endpoints using OpenAPI/Swagger or an equivalent tool.
- Unit tests.

---

## Suggested Completion Time
We recommend completing the assignment within approximately **4 hours**.

However, this is not a strict deadline. Taking longer to complete the task is perfectly acceptable and will not disqualify your work.

---

### Submission Instructions

1. Fork this repository to your GitHub account.
2. Create a new branch for your assignment, named after yourself or the feature, e.g., `feature/john-doe-assignment`.
   ```bash
   git checkout -b feature/<your-name>-assignment

3. Push your work to the new branch in your forked repository.
4. Open a Pull Request (PR) from your branch into the master branch of this repository.
- Add a descriptive PR title and summary explaining your work.
- Notify us via email or any other specified communication channel with a link to the PR.


### PR Guidelines

Ensure the PR description includes:

A summary of the completed work.
- Any assumptions made.
- Areas for potential improvement or your planned next steps if given more time.

---

```Good luck! 🚀```
